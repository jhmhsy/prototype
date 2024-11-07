<div class="dark:bg-night_3">
    <div class="text-center py-4">
        <h1 class="text-5xl font-bold font-raleway">TOP NOTCH EQUIPMENTS</h1>
    </div>
    <div x-data="swipeCards()" x-init="let isDown = false;
    let startX;
    let scrollLeft;
    $el.addEventListener('mousedown', (e) => {
        isDown = true;
        startX = e.pageX - $el.offsetLeft;
        scrollLeft = $el.scrollLeft;
    });
    $el.addEventListener('mouseleave', () => {
        isDown = false;
    });
    $el.addEventListener('mouseup', () => {
        isDown = false;
    });
    $el.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - $el.offsetLeft;
        const walk = (x - startX) * 1;
        $el.scrollLeft = scrollLeft - walk;
    });
    setInterval(() => {
        $el.scrollLeft += 1;
    }, 50);" class="overflow-x-scroll scrollbar-hide relative px-0.5"
        style="overflow-y: hidden;">

        <div class="flex snap-x snap-mandatory gap-4" style="width: max-content;">
            <template x-for="card in cards" :key="card.id">
                <div class="flex-none w-64 snap-center">
                    <div class="bg-peak-3 border-1 border border-peak-1 rounded-lg overflow-hidden mb-4">
                        <img :src="card.image" alt="" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg leading-6 font-bold text-lemon-base" x-text="card.title"></h3>
                            <p class="text-primary mt-2 text-sm" x-text="card.description"></p>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
<script>
    function swipeCards() {
        return {
            cards: [{
                    id: 1,
                    image: `https://png.pngtree.com/background/20230610/original/pngtree-room-with-black-treadmills-sitting-in-the-dark-picture-image_3036575.jpg`,
                    title: 'Treadmill',
                    description: 'Ideal for cardio workouts, simulates walking or running.',
                },
                {
                    id: 2,
                    image: `https://img.pikbest.com/wp/202346/dumbbell-fitness-sleek-3d-black-dumbbells-for-professional-and-bodybuilding-on-a-dark-background_9729697.jpg!w700wp`,
                    title: 'Dumbbells',
                    description: 'Versatile weights for strength training and muscle building.',
                },
                {
                    id: 3,
                    image: `https://img.freepik.com/premium-photo/body-gym-exercise-bike-black-background_996135-46915.jpg`,
                    title: 'Exercise Bike',
                    description: 'Low-impact cycling for cardiovascular fitness.',
                },
                {
                    id: 4,
                    image: `https://img.freepik.com/premium-photo/side-view-sporty-young-woman-exercising-crossfit-machine-black-background-female-exercising-with-rowing-machines-top-section-cropped-side-view-no-face-revealed-detailed-ai-generated_585735-2348.jpg`,
                    title: 'Rowing Machine',
                    description: 'Full-body workout, mimics rowing on water.',
                },
                {
                    id: 5,
                    image: `https://assets.roguefitness.com/f_auto,q_auto,c_limit,w_1600,b_rgb:ffffff/catalog/Conditioning/Strength%20Equipment/Kettlebells/IP0670/IP0670-H_j6gkfw.png`,
                    title: 'Kettlebell',
                    description: 'Compact weight for dynamic strength exercises.',
                },
                {
                    id: 6,
                    image: `https://www.mensjournal.com/.image/ar_16:9%2Cc_fill%2Ccs_srgb%2Cfl_progressive%2Cq_auto:good%2Cw_1200/MTk2MTM2NjQyOTEwMTAyNjcz/mj-618_348_get-fit-on-a-bar-workout.jpg`,
                    title: 'Pull-up Bar',
                    description: 'Essential for upper body strength and endurance.',
                },
                {
                    id: 7,
                    image: `https://img.freepik.com/premium-photo/selective-focus-dark-background-yoga-mat-representing-healthy-lifestyle-sport-copyspace-avail_908985-65045.jpg`,
                    title: 'Yoga Mat',
                    description: 'Comfortable surface for yoga and stretching exercises.',
                }
            ],
            addToCart(product) {
                // Implement your add to cart logic here
                console.log('Adding to cart:', product);
            }
        };
    }
</script>
