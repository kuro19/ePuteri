<body>

<center>
    <h1>SISTEM UNDI PUTERI ISLAM</h1>

    <!-- ⭐ PLACE TO SHOW 24-HOUR TIME -->
    <h2 id="masaSekarang"></h2>
</center>


<!-- ⭐ JAVASCRIPT FOR LIVE CLOCK -->
<script>
function updateClock() {
    let now = new Date();

    let hours = String(now.getHours()).padStart(2, '0');
    let minutes = String(now.getMinutes()).padStart(2, '0');
    let seconds = String(now.getSeconds()).padStart(2, '0');

    let currentTime = hours + ":" + minutes + ":" + seconds;

    document.getElementById("masaSekarang").innerHTML =
        "MASA SEKARANG: " + currentTime + " (24 JAM)";
}

setInterval(updateClock, 1000);
updateClock();
</script>

</body>
</html>
