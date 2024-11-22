<div class="bg-peak-4 pt-4">
    <div class="text-center py-4">
        <h1 class="text-5xl font-bold font-raleway">TOP NOTCH EQUIPMENTS</h1>
    </div>
    <div x-data="swipeCards()" x-init="init()" class="overflow-x-scroll scrollbar-hide relative px-0.5"
        style="overflow-y: hidden;">

        <div class="flex snap-x snap-mandatory gap-4" style="width: max-content;">
            <template x-for="card in cards" :key="card.id">
                <div class="flex-none w-64 snap-center">
                    <div class="bg-black border-1 border border-peak-1 rounded-lg overflow-hidden mb-4">
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
            scrollDirection: 1,
            scrollSpeed: 0.5,
            scrollReversals: 0,
            init() {
                const el = this.$el;

                // Original mouse events remain the same
                el.addEventListener('mousedown', (e) => {
                    this.isDown = true;
                    this.startX = e.pageX - el.offsetLeft;
                    this.scrollLeft = el.scrollLeft;
                });

                el.addEventListener('mouseleave', () => {
                    this.isDown = false;
                });

                el.addEventListener('mouseup', () => {
                    this.isDown = false;
                });

                el.addEventListener('mousemove', (e) => {
                    if (!this.isDown) return;
                    e.preventDefault();
                    const x = e.pageX - el.offsetLeft;
                    const walk = (x - this.startX) * 1;
                    el.scrollLeft = this.scrollLeft - walk;
                });

                // Modified scrolling mechanism
                setInterval(() => {
                    // Check if we've reached the end or start of scroll
                    const maxScroll = el.scrollWidth - el.clientWidth;

                    // Maintain a constant scroll speed
                    const constantScrollSpeed = 1; // Normal speed
                    const reversalSpeed = 1; // Speed during reversal

                    // Reverse direction when reaching the end or start
                    if (el.scrollLeft >= maxScroll) {
                        this.scrollDirection = -1;
                    } else if (el.scrollLeft <= 0) {
                        this.scrollDirection = 1;
                    }

                    // Apply scrolling with normal speed
                    el.scrollLeft += this.scrollDirection * (this.scrollDirection === 1 ? constantScrollSpeed : reversalSpeed);
                }, 100);
            },
            addToCart(product) {
                console.log('Adding to cart:', product);
            }
        };
    }
</script>
