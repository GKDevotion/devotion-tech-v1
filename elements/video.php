<div id="heroCarousel" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="video-banner">
                <video autoplay muted loop playsinline>
                    <source src="assets/video/video.mp4" type="video/mp4">
                </video>

                <div class="banner-content">
                    <h1>Empowering Businesses Through Technology</h1>
                    <p>Devotion Technology delivers innovative digital solutions, enterprise software, cloud services and IT consulting that help organizations accelerate growth, improve efficiency, and stay ahead in a rapidly evolving digital world.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .video-banner {
        position: relative;
        width: 100%;
        height: calc(85vh - 90px);
        min-height: 500px;
        overflow: hidden;
    }

    .video-banner video {
        width: 100%;
        height: 100%;
        object-fit: fill;
        display: block;
    }

    .video-banner::before {
        content: "";
        position: relative;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        z-index: 1;
    }

    .banner-content {
        position: absolute;
        top: 50%;
        left: 8%;
        transform: translateY(-50%);
        z-index: 2;
        color: #fff;
        max-width: 650px;
    }

    .banner-content h1 {
        font-size: 4rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .banner-content p {
        font-size: 1.25rem;
        margin-bottom: 30px;
    }

    @media (max-width: 768px) {
        .video-banner {
            height: 60vh;
            min-height: 350px;
        }

        .banner-content {
            left: 5%;
            right: 5%;
        }

        .banner-content h1 {
            font-size: 2.2rem;
        }
    }
</style>