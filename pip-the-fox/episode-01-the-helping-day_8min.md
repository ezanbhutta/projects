# Pip the Fox — Episode 01: "The Helping Day"
### Full 8:00 production bible (expanded to 60 shots, 16:9 widescreen)

> **Why this document exists:** No available video model renders a single 8-minute
> file — the strongest character-consistency model here (Seedance 2.0) caps at
> **15s per clip**. An 8-minute episode is therefore built as **~60 short clips**
> assembled in an editor. Your original script was 22 shots (~2:56). This bible
> expands it to **60 shots × 8s = 480s = exactly 8:00**, keeping the same story,
> cast, and tone.

---

## Production status / pipeline

| Phase | What | Tool | Status |
|------|------|------|--------|
| 1 | Generate 5 reference stills (Block A) | `generate_image` (Nano Banana Pro) | ⏳ blocked — platform outage |
| 2 | Lock each still as a reusable **Element** | `show_reference_elements` (create) | ⏳ |
| 3 | Generate 60 clips, image-to-video, refs locked | `generate_video` (Seedance 2.0, 8s, 16:9) | ⏳ |
| 4 | Assemble clips + VO + music into final cut | external editor (not in this toolset) | manual |

**Generated here:** the reference art and the 60 silent/ambient clips.
**Not generated here:** a narrator reading the exact VO lines, the ukulele/xylophone
music bed, and the final timed/mixed cut. Those are an edit step — Phase 4 — for
which this doc doubles as a frame-accurate edit & VO sheet.

---

## BLOCK A — Reference ingredients (generate ONCE, reuse as locked refs)

Generate each as a still, then save as an Element so every shot pulls the identical
character. This is what prevents drift across 60 clips.

**`[PIP]` — main character**
> A small, round, friendly fox kit in soft 3D Pixar-style animation. Bright orange
> fur, fluffy cheeks, oversized warm amber eyes, a fluffy tail with a white tip,
> wearing one small sky-blue scarf. Cute, expressive, approachable. Clean studio
> lighting, neutral background, full body, front view.

**`[BRAMBLE]` — turtle**
> A slow, gentle baby turtle with a leaf-green shell and sleepy happy eyes. Soft 3D
> Pixar style, rounded, cute. Neutral background, full body.

**`[TILLY]` — bird**
> A tiny round yellow bird with big eyes and a little tuft on her head. Soft 3D
> Pixar style, rounded, cute. Neutral background, full body.

**`[MOMO]` — bear cub**
> A soft brown bear cub, chubby, shy smile, holding a small honey pot. Soft 3D
> Pixar style, rounded, cute. Neutral background, full body.

**`[STYLE]` — world / style stub (prepend to every shot prompt)**
> Soft 3D Pixar-style preschool animation. Bright sunny storybook forest: soft
> rounded trees, glowing green grass, gentle blue sky with fluffy clouds, warm
> golden light. High saturation, smooth shapes, cheerful, no sharp edges, nothing
> scary. 16:9 widescreen.

---

## Voice & music direction (for Phase 4 / VO tool)

- **Narrator:** warm, gentle, slightly playful female voice, slow clear pace.
- **Pip:** bright, sweet, young.
- **Music:** light ukulele + xylophone, cheerful, soft; two gentle "helping song"
  swells (≈2:00 and ≈4:40), one tender dip in the rain (≈6:00–6:56), full bright
  resolve at the rainbow (≈7:28).

---

## How to read the shot list

Each shot's **Visual** uses the tags above. At generation time the `[PIP]` /
`[BRAMBLE]` / `[TILLY]` / `[MOMO]` / `[STYLE]` tags are replaced with the locked
Element references (and the style stub prepended), so prompts stay short and the
look stays identical. Every clip = **8s, Seedance 2.0, 16:9**.

---

## SHOT LIST — 60 shots / 8:00

### SEQ 1 · Morning (0:00–0:40)

**Shot 1 · 0:00** — Visual: `[STYLE]` exterior of a cozy grass den at dawn, soft mist, slow push-in toward the round doorway.
Action: gentle camera push-in, birds waking. · VO: *NARRATOR: "Good morning! The sun is waking up the whole forest."* · Audio: soft wake-up chime, birdsong.

**Shot 2 · 0:08** — Visual: `[STYLE]` inside the den, `[PIP]` curled asleep in a nest of soft grass, a warm sunbeam crossing his face, slow push-in.
Action: Pip breathes softly, ear twitches. · VO: *NARRATOR: "And the sun is waking up someone special."* · Audio: cozy hum, distant birds.

**Shot 3 · 0:16** — Visual: `[STYLE]` `[PIP]` stretches his paws and yawns wide, then his amber eyes pop open happily.
Action: big stretch, yawn, bright-eyed wake. · VO: *NARRATOR: "Good morning, Pip!"* · Audio: cheerful little chime.

**Shot 4 · 0:24** — Visual: `[STYLE]` `[PIP]` pokes his head out the round den doorway, blinking at the bright sunny forest.
Action: head pokes out, blinks, sniffs the air. · VO: *PIP: "Ooh — what a bright, sunny day!"* · Audio: warm ambience, leaves rustle.

**Shot 5 · 0:32** — Visual: `[STYLE]` wide — `[PIP]` hops out of the den and spins around, looking at the sunlit forest, excited.
Action: hops out, happy spin, looks around. · VO: *NARRATOR: "Today felt like a perfect day to play."* · Audio: cheerful ukulele begins.

### SEQ 2 · A day to help (0:40–1:04)

**Shot 6 · 0:40** — Visual: `[STYLE]` wide establishing shot, `[PIP]` trots down a winding grass path between soft round trees, camera follows.
Action: happy trot, tail swishing. · VO: *NARRATOR: "Pip set off down the path."* · Audio: ukulele + light footsteps.

**Shot 7 · 0:48** — Visual: `[STYLE]` `[PIP]` pauses to sniff a big cartoon flower; a gentle butterfly flutters past his nose.
Action: sniff, butterfly passes, giggles, follows it with his eyes. · VO: *PIP (giggling): "Hello, little butterfly!"* · Audio: tiny twinkle, soft giggle.

**Shot 8 · 0:56** — Visual: `[STYLE]` `[PIP]` looks around brightly, paws on hips, a sunny clearing behind him.
Action: confident look around, happy nod. · VO: *PIP: "What a perfect day… to help my friends!"* · Audio: bright xylophone sting.

### SEQ 3 · Bramble the turtle (1:04–2:00)

**Shot 9 · 1:04** — Visual: `[STYLE]` `[PIP]` walking, his ears suddenly perk at a tiny sound off-path.
Action: stops mid-step, ears swivel, head tilts. · VO: *NARRATOR: "Wait — what was that?"* · Audio: gentle "uh-oh" note.

**Shot 10 · 1:12** — Visual: `[STYLE]` reveal — `[BRAMBLE]` flipped on his back beside the path, little legs wiggling in the air.
Action: turtle wiggles legs, can't right himself. · VO: *BRAMBLE (small): "Oh dear… oh dear…"* · Audio: worried wiggle sound.

**Shot 11 · 1:20** — Visual: `[STYLE]` `[PIP]` rushes over and gasps, leaning toward `[BRAMBLE]`.
Action: skids to a stop, paws to cheeks, concerned. · VO: *PIP: "Oh no! Bramble, are you stuck?"* · Audio: soft gasp.

**Shot 12 · 1:28** — Visual: `[STYLE]` close two-shot, `[BRAMBLE]` looking up at `[PIP]` with sleepy hopeful eyes.
Action: Bramble nods, legs still waving. · VO: *BRAMBLE: "I rolled right over and I can't get up!"* · Audio: gentle music bed.

**Shot 13 · 1:36** — Visual: `[STYLE]` `[PIP]` braces his paws against `[BRAMBLE]`'s shell and pushes, little effort face.
Action: pushes, paws dig in, determined squint. · VO: *PIP (effort): "Don't worry — I've got you… nnngh!"* · Audio: soft effort grunt, light drum taps.

**Shot 14 · 1:44** — Visual: `[STYLE]` the shell rocks and `[BRAMBLE]` rolls upright onto his feet, beaming.
Action: shell tips, turtle lands on feet, big smile. · VO: *NARRATOR: "And up he went!"* · Audio: soft success ding.

**Shot 15 · 1:52** — Visual: `[STYLE]` `[BRAMBLE]` and `[PIP]` smiling at each other in warm light.
Action: happy bounce, tiny high-five. · VO: *BRAMBLE: "Thank you, Pip!" / PIP: "Anytime!"* · Audio: cheerful chime.

### SEQ 4 · Helping song A (2:00–2:16)

**Shot 16 · 2:00** — Visual: `[STYLE]` `[PIP]` trots happily on through dappled light, flowers gently nodding as he passes.
Action: bouncy skip-walk, hums. · VO: *(song, light)* · Audio: ukulele + xylophone swell #1.

**Shot 17 · 2:08** — Visual: `[STYLE]` low tracking shot of `[PIP]`'s happy trot, tail wagging, sun flares softly.
Action: content trot, glances at the sky. · VO: *NARRATOR: "Helping a friend made Pip feel warm inside."* · Audio: music continues, birds.

### SEQ 5 · Tilly the bird (2:16–3:12)

**Shot 18 · 2:16** — Visual: `[STYLE]` `[PIP]` stops, ears perking at sad little chirps, looks up toward a tree.
Action: pause, ear tilt, gentle concern. · VO: *NARRATOR: "Someone sounded sad."* · Audio: tiny worried chirps.

**Shot 19 · 2:24** — Visual: `[STYLE]` reveal — `[TILLY]` hopping on the ground beside a fallen twig, gazing up at a low nest.
Action: hops, flutters, can't lift the twig. · VO: *TILLY (sniffly): "Oh no, oh no…"* · Audio: soft flutter, sad chirp.

**Shot 20 · 2:32** — Visual: `[STYLE]` `[PIP]` crouches beside `[TILLY]`, kind and gentle.
Action: leans in, soft eyes. · VO: *PIP: "Tilly, what's wrong?" / TILLY: "My nest twig fell down."* · Audio: tender music.

**Shot 21 · 2:40** — Visual: `[STYLE]` `[PIP]` brightens with an idea and gently picks the twig up in his mouth.
Action: ears pop up, picks up twig. · VO: *PIP (muffled, twig in mouth): "I have an idea!"* · Audio: light "thinking" twinkle.

**Shot 22 · 2:48** — Visual: `[STYLE]` low angle — `[PIP]` looks up at the little nest in a low branch, eyes determined.
Action: measures the height, sets paws. · VO: *NARRATOR: "Pip looked up… just a little higher."* · Audio: gentle rising note.

**Shot 23 · 2:56** — Visual: `[STYLE]` `[PIP]` stretches up on tip-toes and carefully sets the twig into the nest.
Action: tip-toe stretch, places twig gently. · VO: *PIP (soft): "There… you… go."* · Audio: soft place sound.

**Shot 24 · 3:04** — Visual: `[STYLE]` the twig clicks into place; `[TILLY]` flies a happy loop around `[PIP]`.
Action: nest complete, Tilly loops joyfully. · VO: *TILLY: "You fixed it! Thank you, Pip!"* · Audio: happy chirp + ding.

### SEQ 6 · Transition (3:12–3:28)

**Shot 25 · 3:12** — Visual: `[STYLE]` `[PIP]` waves bye to `[TILLY]` and heads toward a glittering gentle stream.
Action: waves, turns, trots on. · VO: *PIP: "Bye, Tilly!"* · Audio: ukulele, water shimmer.

**Shot 26 · 3:20** — Visual: `[STYLE]` wide — `[PIP]` walking beside the sparkling stream, dragonflies drifting.
Action: peaceful walk, looks around. · VO: *NARRATOR: "Pip kept helping, friend by friend."* · Audio: soft water, music.

### SEQ 7 · Momo the bear (3:28–4:32)

**Shot 27 · 3:28** — Visual: `[STYLE]` `[PIP]` spots `[MOMO]` sitting sadly by the stream, an empty honey pot tipped beside him.
Action: notices Momo, slows, soft worry. · VO: *NARRATOR: "But this friend looked very sad."* · Audio: sad soft note.

**Shot 28 · 3:36** — Visual: `[STYLE]` `[PIP]` approaches `[MOMO]` softly and sits beside him.
Action: gentle approach, sits close. · VO: *PIP: "Momo, why so sad?"* · Audio: tender music.

**Shot 29 · 3:44** — Visual: `[STYLE]` close on `[MOMO]`, lip wobbling, looking at the empty honey pot.
Action: sniffle, points at pot. · VO: *MOMO: "I… I dropped all my honey."* · Audio: tiny sniffle.

**Shot 30 · 3:52** — Visual: `[STYLE]` `[PIP]` looks around and spots a low bush full of bright berries nearby.
Action: head turns, eyes light up. · VO: *NARRATOR: "Then Pip saw something."* · Audio: hopeful twinkle.

**Shot 31 · 4:00** — Visual: `[STYLE]` `[PIP]` points to the berry bush, sunshine on the berries.
Action: points, encouraging smile. · VO: *PIP: "Look! Sweet berries. Let's share them!"* · Audio: hopeful rise in music.

**Shot 32 · 4:08** — Visual: `[STYLE]` `[MOMO]` perks up, a hopeful smile spreading.
Action: ears lift, small happy gasp. · VO: *MOMO: "Berries? For… both of us?"* · Audio: warm lift.

**Shot 33 · 4:16** — Visual: `[STYLE]` `[PIP]` and `[MOMO]` picking and munching berries together by the stream, giggling.
Action: pick, munch, share, giggle. · VO: *(happy munching, giggles)* · Audio: cheerful music, giggles.

**Shot 34 · 4:24** — Visual: `[STYLE]` close two-shot, `[MOMO]` smiling warmly at `[PIP]`, berry on his nose.
Action: happy smile, contented. · VO: *MOMO: "Yum! Thank you for helping me, Pip."* · Audio: soft ding.

### SEQ 8 · Midpoint kindness song (4:32–4:56)

**Shot 35 · 4:32** — Visual: `[STYLE]` warm wide shot of the sunny forest, `[PIP]` walking content, friends glimpsed happy in their spots.
Action: gentle montage feel, walk. · VO: *(song)* · Audio: ukulele + xylophone swell #2.

**Shot 36 · 4:40** — Visual: `[STYLE]` soft slow push on `[PIP]`'s happy face, light flares.
Action: serene smile, looks ahead. · VO: *NARRATOR: "Helping others filled Pip's heart right up."* · Audio: music peak (gentle).

**Shot 37 · 4:48** — Visual: `[STYLE]` `[PIP]` glances up — the afternoon light is just starting to turn golden.
Action: looks up, slight wonder. · VO: *NARRATOR: "The day was getting late."* · Audio: music settles.

### SEQ 9 · Heading home, weather turns (4:56–5:44)

**Shot 38 · 4:56** — Visual: `[STYLE]` wide afternoon — `[PIP]` waves bye to `[MOMO]` and starts the walk home.
Action: wave, turn, set off. · VO: *PIP: "Bye, Momo! See you soon!"* · Audio: music, gentle.

**Shot 39 · 5:04** — Visual: `[STYLE]` `[PIP]` trotting home along the path, satisfied.
Action: happy tired trot. · VO: *NARRATOR: "Pip helped everyone today. Now it was time to go home."* · Audio: music softens.

**Shot 40 · 5:12** — Visual: `[STYLE]` the sky shifts from gold to soft grey, fluffy clouds gathering; `[PIP]` looks up.
Action: pauses, looks up, curious. · VO: *NARRATOR: "But then… the sky began to change."* · Audio: soft wind, distant gentle rumble (not scary).

**Shot 41 · 5:20** — Visual: `[STYLE]` close — a single raindrop lands on `[PIP]`'s nose; he blinks, surprised.
Action: drop lands, surprised blink, crosses eyes. · VO: *PIP: "Oh! A raindrop?"* · Audio: tiny plip.

**Shot 42 · 5:28** — Visual: `[STYLE]` wider — a few more drops fall, gentle ripples on the path; `[PIP]` glances around.
Action: looks up and around, scarf flutters. · VO: *NARRATOR: "The rain had come to visit."* · Audio: soft rain begins.

**Shot 43 · 5:36** — Visual: `[STYLE]` light rain now; `[PIP]` tugs his blue scarf snug and begins to hurry.
Action: tugs scarf, picks up pace. · VO: *PIP: "I'd better hurry home!"* · Audio: light rain, soft worried music.

### SEQ 10 · Pip gets stuck (5:44–6:24)

**Shot 44 · 5:44** — Visual: `[STYLE]` `[PIP]` hurrying down a wet grassy slope; his paws begin to slip.
Action: quick steps, paws skid. · VO: *PIP: "Woah—!"* · Audio: slip sound, soft.

**Shot 45 · 5:52** — Visual: `[STYLE]` `[PIP]` slides gently down into a small shallow mud dip (soft, cartoonish, not scary).
Action: gentle slide, soft landing, sits. · VO: *(small "oof")* · Audio: soft squish.

**Shot 46 · 6:00** — Visual: `[STYLE]` `[PIP]` tries to climb out; his paws slip on the slope and he slides back, sitting down.
Action: tries, slips, sits, ears droop. · VO: *PIP: "Hmm… it's too slippery."* · Audio: rain, gentle worried note.

**Shot 47 · 6:08** — Visual: `[STYLE]` close on `[PIP]`'s worried face in the rain, blue scarf damp.
Action: looks around, small frown. · VO: *PIP: "Oh no… I can't get out. And it's so far home."* · Audio: soft rain, tender music.

**Shot 48 · 6:16** — Visual: `[STYLE]` closer — `[PIP]`'s ears droop, a small sigh, a tiny bit scared but sweet.
Action: sigh, hugs his own tail. · VO: *PIP (soft): "I wish someone could help me too."* · Audio: gentle melancholy note.

### SEQ 11 · Friends return (6:24–7:12)

**Shot 49 · 6:24** — Visual: `[STYLE]` from `[PIP]`'s POV — three small familiar shapes appear through the soft rain, coming closer together.
Action: shapes approach, hopeful reveal. · VO: *NARRATOR: "But Pip was not alone."* · Audio: music turns hopeful.

**Shot 50 · 6:32** — Visual: `[STYLE]` `[BRAMBLE]`, `[TILLY]`, and `[MOMO]` arrive at the edge of the dip, kind and determined.
Action: friends line up, warm smiles. · VO: *FRIENDS: "Pip! We're coming!"* · Audio: warm rising music.

**Shot 51 · 6:40** — Visual: `[STYLE]` `[TILLY]` flutters overhead holding a big leaf like an umbrella over `[PIP]`.
Action: leaf shelters Pip from rain. · VO: *TILLY: "We're here, Pip!"* · Audio: flutter, cozy note.

**Shot 52 · 6:48** — Visual: `[STYLE]` `[MOMO]` leans down and reaches a strong paw into the dip toward `[PIP]`.
Action: reaches down, steady. · VO: *MOMO: "I've got you!"* · Audio: warm swell.

**Shot 53 · 6:56** — Visual: `[STYLE]` `[BRAMBLE]` slowly pushes a flat log into the dip to make a little ramp.
Action: turtle nudges log into place. · VO: *BRAMBLE: "Climb up, Pip — nice and slow."* · Audio: soft wood scrape, gentle.

**Shot 54 · 7:04** — Visual: `[STYLE]` `[PIP]` climbs the log ramp with `[MOMO]`'s paw, reaches the top safe — all four hug.
Action: climbs, safe, big group hug. · VO: *BRAMBLE: "Friends help friends."* · Audio: triumphant little ding.

### SEQ 12 · Walk home / rainbow (7:12–7:44)

**Shot 55 · 7:12** — Visual: `[STYLE]` the four friends walk home in a happy row under big leaf-umbrellas, rain easing.
Action: cheerful row-walk, splashing softly. · VO: *(happy chatter)* · Audio: music brightens.

**Shot 56 · 7:20** — Visual: `[STYLE]` close on the walking group, `[PIP]` looking around at his friends, beaming.
Action: Pip looks at each friend, grateful. · VO: *PIP: "You all came to help me!" / FRIENDS: "Because you helped us!"* · Audio: music fuller.

**Shot 57 · 7:28** — Visual: `[STYLE]` the sun breaks through the clouds; a small soft rainbow arcs over the forest.
Action: clouds part, rainbow blooms. · VO: *(gentle wonder "ooooh")* · Audio: magical chime.

**Shot 58 · 7:36** — Visual: `[STYLE]` the four friends stop and gaze up at the rainbow in wonder, warm light on their faces.
Action: all look up, joyful. · VO: *NARRATOR: "When you help others, kindness always finds its way back to you."* · Audio: warm music peak.

### SEQ 13 · Cozy ending + outro (7:44–8:00)

**Shot 59 · 7:44** — Visual: `[STYLE]` cozy interior of `[PIP]`'s den at sunset, all four friends sharing berries, warm glow.
Action: share food, laugh softly, snuggle. · VO: *NARRATOR: "And that made Pip the happiest fox in the whole forest."* · Audio: soft, content music.

**Shot 60 · 7:52** — Visual: `[STYLE]` `[PIP]` steps toward camera and waves with his blue scarf, big smile, bright background.
Action: steps forward, waves directly to viewer. · VO: *PIP: "Will you be kind today too? Wave bye-bye with me!"* · Audio: final cheerful jingle.

---

## Assembly / edit plan (Phase 4)

1. Drop the 60 clips on the timeline **in order** (each 8s) → 8:00 master.
2. Record/generate VO per the lines above; place narrator + character lines on the
   timecodes shown.
3. Lay the ukulele/xylophone bed under everything; swell at shots 16, 35, 57; dip
   soft during the rain (44–48).
4. Add the small SFX noted per shot (chimes, dings, plip, flutter).
5. Light color pass for consistency; gentle crossfades between sequences.
6. Optional: upscale the final cut (Topaz, available here via `upscale_video`).

## Credits / cost note

This is a large job (5 stills + 60 clips). Before mass-generating I'll preflight the
exact credit cost and check the balance (both currently failing due to the outage),
and I recommend approving the 5 reference stills first, eyeballing the look, then
green-lighting the 60 clips.
