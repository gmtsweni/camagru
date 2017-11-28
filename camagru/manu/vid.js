(function () {
    var video = document.querySelector("#videoElement"),
    canvas  = document.getElementById('canvas'),
    context = canvas.getContext('2d'),
    pic = document.getElementById('photo');

navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

if (navigator.getUserMedia) {       
   navigator.getUserMedia({video: true,audio: false}, handleVideo, videoError);
}

function handleVideo(stream) {
   video.src = window.URL.createObjectURL(stream);
   video.play();
}

function videoError(e) {
   // do something
}
var button = document.getElementById('btn-download');
button.addEventListener('click', function (e) {
    var dataURL = canvas.toDataURL('image/png');
    button.href = dataURL;
});
document.getElementById('capture').addEventListener('click', function() {
    context.drawImage(video, 0, 0);
    pic.setAttribute('src', canvas.toDataURL('image/png'));
});
})();