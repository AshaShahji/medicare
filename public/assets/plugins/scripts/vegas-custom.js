// $(".homepage-banner").vegas({
//     slides: [
//         { src: "assets/images/main-banner.jpg" ,
//          video: {
//                 src: [
//                     'assets/videos/explore.mp4',
//                     '/videos/video.webm',
//                     '/videos/video.ogv'
//                 ],
//                 loop: false,
//                 mute: true
//             }
//         // { src: "assets/videos/explore.mp4" }

//     }
// });

$(".homepage-banner").vegas({ 
	slides: [
        {   src: 'assets/images/slider1.jpg' },
        {   src: 'assets/images/slider2.jpg' },
        {   src: 'assets/images/slider3.jpg' },
        {   src: 'assets/images/slider4.jpg' },
        {   src: 'assets/images/slider5.jpg' },
        {   src: 'assets/images/slider6.jpg' },
        {   src: 'assets/images/slider7.jpg' },
        {   src: 'assets/images/slider8.jpg' },
        {   src: 'assets/images/main-banner.jpg',
            video: {
                src: [
                    'assets/videos/explore.mp4',
                ],
                loop: true,
                mute: true
            }
        }
    ]
});
