<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function () {
    // Step 1: Get and store the match time only once
    const matchDateText = $('.matchDateText').text().trim();
    console.log('MmatchDateTextd:',matchDateText);  // Optional: Debug ke liye

    
    // Clean the text
    const matchDateStr = matchDateText.split(' ').slice(1).join(' ').replace('IST', '').trim();

    const year = new Date().getFullYear(); // Current year
    const matchTime = new Date(matchDateStr + " " + year); // 🔒 Lock kar diya yahan

    function updateCountdown() {
        const now = new Date().getTime();
        const timeLeft = matchTime.getTime() - now; // 🔒 Yahi purana matchTime use hoga hamesha

         console.log('Match timeLeft Locked:', timeLeft);  // Optional: Debug ke liye


        if (timeLeft <= 0) {
            $('#countdown').html("<p class='text-center text-white text-lg font-bold'>Match Started!</p>");
            return;
        }

        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        $('#days').text(days.toString().padStart(2, '0'));
        $('#hours').text(hours.toString().padStart(2, '0'));
        $('#minutes').text(minutes.toString().padStart(2, '0'));
        $('#seconds').text(seconds.toString().padStart(2, '0'));
    }

    setInterval(updateCountdown, 1000);
    updateCountdown();
});
</script>
