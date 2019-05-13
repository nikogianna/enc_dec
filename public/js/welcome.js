var b1 = $('#button1');
var b2 = $('#button2');
var b3 = $('#button3');
var b4 = $('#button4');
var b5 = $('#button5');

b1.on('click', function() {
    var duration = 0.3,
        delay = 0.08;
    TweenMax.to(b1, duration, {
        scaleY: 1.6,
        ease: Expo.easeOut
    });
    TweenMax.to(b1, duration, {
        scaleX: 1.2,
        scaleY: 1,
        ease: Back.easeOut,
        easeParams: [3],
        delay: delay
    });
    TweenMax.to(b1, duration * 1.25, {
        scaleX: 1,
        scaleY: 1,
        ease: Back.easeOut,
        easeParams: [6],
        delay: delay * 3
    });
});

b2.on('click', function() {
    var duration = 0.3,
        delay = 0.08;
    TweenMax.to(b2, duration, {
        scaleY: 1.6,
        ease: Expo.easeOut
    });
    TweenMax.to(b2, duration, {
        scaleX: 1.2,
        scaleY: 1,
        ease: Back.easeOut,
        easeParams: [3],
        delay: delay
    });
    TweenMax.to(b2, duration * 1.25, {
        scaleX: 1,
        scaleY: 1,
        ease: Back.easeOut,
        easeParams: [6],
        delay: delay * 3
    });
});

b3.on('click', function() {
    var duration = 0.3,
        delay = 0.08;
    TweenMax.to(b3, duration, {
        scaleY: 1.6,
        ease: Expo.easeOut
    });
    TweenMax.to(b3, duration, {
        scaleX: 1.2,
        scaleY: 1,
        ease: Back.easeOut,
        easeParams: [3],
        delay: delay
    });
    TweenMax.to(b3, duration * 1.25, {
        scaleX: 1,
        scaleY: 1,
        ease: Back.easeOut,
        easeParams: [6],
        delay: delay * 3
    });
});

b4.on('click', function() {
    var duration = 0.3,
        delay = 0.08;
    TweenMax.to(b4, duration, {
        scaleY: 1.6,
        ease: Expo.easeOut
    });
    TweenMax.to(b4, duration, {
        scaleX: 1.2,
        scaleY: 1,
        ease: Back.easeOut,
        easeParams: [3],
        delay: delay
    });
    TweenMax.to(b4, duration * 1.25, {
        scaleX: 1,
        scaleY: 1,
        ease: Back.easeOut,
        easeParams: [6],
        delay: delay * 3
    });
});

b5.on('click', function() {
    var duration = 0.3,
        delay = 0.08;
    TweenMax.to(b5, duration, {
        scaleY: 1.6,
        ease: Expo.easeOut
    });
    TweenMax.to(b5, duration, {
        scaleX: 1.2,
        scaleY: 1,
        ease: Back.easeOut,
        easeParams: [3],
        delay: delay
    });
    TweenMax.to(b5, duration * 1.25, {
        scaleX: 1,
        scaleY: 1,
        ease: Back.easeOut,
        easeParams: [6],
        delay: delay * 3
    });
});
