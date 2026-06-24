#!/usr/bin/env python3
"""
download_unello_images.py
Download every Unsplash photo referenced by the Unello site into
unello/assets/img/photos/<photo-id>.jpg so the site can be self-hosted
(no hotlinking) when handed off.

Usage:
    python download_unello_images.py
"""
import os
import re
import subprocess
import sys

HERE = os.path.dirname(os.path.abspath(__file__))
# the script may live at repo root or inside unello/ — find data.js either way
CANDIDATES = [
    os.path.join(HERE, "assets", "js", "data.js"),
    os.path.join(HERE, "unello", "assets", "js", "data.js"),
]
DATA_JS = next((p for p in CANDIDATES if os.path.exists(p)), None)
if not DATA_JS:
    sys.exit("Could not find assets/js/data.js next to this script.")

OUT_DIR = os.path.join(os.path.dirname(os.path.dirname(DATA_JS)), "img", "photos")
os.makedirs(OUT_DIR, exist_ok=True)

WIDTH = 1600  # one good-resolution copy per photo; site can still request crops
src = open(DATA_JS, encoding="utf-8").read()
ids = sorted(set(re.findall(r"photo-[a-zA-Z0-9_-]+", src)))
print(f"Found {len(ids)} unique photos. Saving to {OUT_DIR}\n")

ok, fail = 0, 0
for i, pid in enumerate(ids, 1):
    dest = os.path.join(OUT_DIR, pid + ".jpg")
    url = f"https://images.unsplash.com/{pid}?auto=format&fit=crop&w={WIDTH}&q=80"
    # curl honours the environment proxy; -f fails on HTTP errors
    r = subprocess.run(
        ["curl", "-fsS", "--max-time", "40", "-o", dest, url],
        capture_output=True, text=True,
    )
    if r.returncode == 0 and os.path.getsize(dest) > 1000:
        size = os.path.getsize(dest) // 1024
        print(f"  [{i:>2}/{len(ids)}] ok   {pid}.jpg ({size} KB)")
        ok += 1
    else:
        print(f"  [{i:>2}/{len(ids)}] FAIL {pid}  {r.stderr.strip()[:80]}")
        fail += 1

print(f"\nDone: {ok} downloaded, {fail} failed -> {OUT_DIR}")
if fail:
    sys.exit(1)
