function playAudioAndGif() {
    var audio = document.getElementById("myAudio");
    var gif = document.getElementById("myGif");
    var containerk = document.getElementById("containerk");

    audio.play();
    containerk.classList.add("show-gif");
    setTimeout(function () {
        containerk.classList.remove("show-gif");
        // audio.pause();
        // audio.currentTime = 0;
    }, 1300);
}

function toggleAudioLoop() {
    var kururin = document.getElementById("kururin");
    var playButton = document.getElementById("playButton");
    var stopButton = document.getElementById("stopButton");

    if (kururin.paused) {
        kururin.play();
        playButton.style.display = "none";
        stopButton.style.display = "inline-block";
    } else {
        kururin.pause();
        kururin.currentTime = 0;
        playButton.style.display = "inline-block";
        stopButton.style.display = "none";
    }
}

document.getElementById("no_hp").addEventListener("input", function () {
    var input = this.value;
    input = input.replace(/\+|-/g, ""); // Menghapus tanda "+" atau "-"
    input = input.replace(/[^\d]/g, ""); // Menghapus karakter selain digit
    this.value = input;
});
