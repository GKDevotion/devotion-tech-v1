<style> 
.projects-section{
    padding-top: 100vh;
    padding-bottom: 100vh;
}

.project-card{
    position: sticky;
    top: calc((100vh - 550px)/2);
    height:550px;
    border-radius:30px;
    overflow:hidden; 
    margin-top: 100px;
}
 

/* Last card */
.project-card:last-child{
    position: relative;      /* Remove sticky */
    top: 0;  
     margin-top: 120px;
}

.card-one{z-index:1;}
.card-two{z-index:2;}
.card-three{z-index:3;}

 
/* Different Backgrounds */
.card-one{
    background:#DDF3FF;
}

.card-two{
    background:#EDE9FF;
}

.card-three{
    background:#E8F7DD;
}

.project-card img{
    width:100%;
    height:550px;
    object-fit:cover;
}

.project-card h2{
    font-size:48px;
    line-height:1.15;
    font-weight:600;
}

.project-card p{
    font-size:20px;
    color:#555;
}

.project-card .btn{
    padding:14px 26px;
    border-radius:12px;
}

/* Mobile */
@media(max-width:991px){

    .project-card{
        position:relative;
        top:auto;
        transform:none;
        margin:40px 15px;
        min-height:auto;
    }

    .project-card img{
        height:320px;
    }

}
</style>

<section class="projects-section py-5">

    <div class="container">

        <!-- Card 1 -->
        <div class="project-card card-one ">
            <div class="row align-items-center h-100">

                <div class="col-lg-5 p-5">
                    <h5>RemoteCo.</h5>

                    <h2 class="my-4">
                        Leading Job Marketplace in Latin America
                    </h2>

                    <p>
                        RemoteCo helps employers from a diverse set of industries
                        find and hire remote employees.
                    </p>

                    <button class="btn btn-light mt-4">
                        PROJECT DETAILS →
                    </button>
                </div>

                <div class="col-lg-7 p-0">
                    <img
                        src="https://images.unsplash.com/photo-1460925895917-afdab827c52f"
                        class="img-fluid w-100 h-100 object-fit-cover"
                    >
                </div>

            </div>
        </div>

        <!-- Card 2 -->
        <div class="project-card card-two">
            <div class="row align-items-center h-100">

                <div class="col-lg-5 p-5">
                    <h5>GetLitt!</h5>

                    <h2 class="my-4">
                        e-Book Reading App for Kids with Gamification
                    </h2>

                    <p>
                        Best online book reading app for kids.
                        Let your child discover a magical world of imagination.
                    </p>

                    <button class="btn btn-light mt-4">
                        PROJECT DETAILS →
                    </button>
                </div>

                <div class="col-lg-7 p-0">
                    <img
                        src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3"
                        class="img-fluid w-100 h-100 object-fit-cover"
                    >
                </div>

            </div>
        </div>

        <!-- Card 3 -->
        <div class="project-card card-three">
            <div class="row align-items-center h-100">

                <div class="col-lg-5 p-5">
                    <h5>EnGolfer</h5>

                    <h2 class="my-4">
                        Super-app for golf players, coaches and facilities
                    </h2>

                    <p>
                        Connect golfers, coaches and facilities for scheduling,
                        booking and networking.
                    </p>

                    <button class="btn btn-light mt-4">
                        PROJECT DETAILS →
                    </button>
                </div>

                <div class="col-lg-7 p-0">
                    <img
                        src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f"
                        class="img-fluid w-100 h-100 object-fit-cover"
                    >
                </div>

            </div>
        </div>

        <div class="some-other-div"></div>

    </div>

</section>

<script>
gsap.registerPlugin(ScrollTrigger);

gsap.utils.toArray(".project-card").forEach((card, index) => {

    gsap.fromTo(card,
        {
            scale:1,
            opacity:1
        },
        {
            scale:0.92,
            opacity:0.85,
            ease:"none",
            scrollTrigger:{
                trigger:card,
                start:"top center",
                end:"bottom center",
                scrub:true
            }
        }
    );

});
// gsap.registerPlugin(ScrollTrigger);

// gsap.utils.toArray(".project-card").forEach((card, i, cards) => {
//   ScrollTrigger.create({
//     trigger: card,
//     start: "center center",
//     end: "+=100%",
//     pin: true,
//     pinSpacing: i !== cards.length - 1,
//     anticipatePin: 1
//   });

//   gsap.to(card, {
//     scale: 0.92,
//     scrollTrigger: {
//       trigger: card,
//       start: "center center",
//       end: "+=100%",
//       scrub: true
//     }
//   });
// });
</script>