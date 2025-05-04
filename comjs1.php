<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function () {
    const matchDateText = $('.matchDateText').text().trim();
    console.log('Original matchDateText:', matchDateText);

    // Example: "Match: 27 Apr 5:00 PM IST"
    const cleanText = matchDateText.replace('Match:', '').replace('IST', '').trim();
    console.log('Cleaned Text:', cleanText);

    const parts = cleanText.split(' ');

    const date = parts[0];
    const month = parts[1];
    const time = parts[2];
    const ampm = parts[3];

    const [hoursStr, minutesStr] = time.split(':');
    let hours = parseInt(hoursStr);
    const minutes = parseInt(minutesStr);

    if (ampm.toUpperCase() === 'PM' && hours !== 12) {
        hours += 12;
    }
    if (ampm.toUpperCase() === 'AM' && hours === 12) {
        hours = 0;
    }

    const months = {
        Jan: 0, Feb: 1, Mar: 2, Apr: 3, May: 4, Jun: 5,
        Jul: 6, Aug: 7, Sep: 8, Oct: 9, Nov: 10, Dec: 11
    };

    const year = new Date().getFullYear();

    const matchTime = new Date(year, months[month], parseInt(date), hours, minutes, 0);
    console.log('Locked MatchTime:', matchTime);

    function updateCountdown() {
        const now = new Date().getTime();
        const timeLeft = matchTime.getTime() - now;
        console.log('Match timeLeft Locked comjs1:',timeLeft,now);  // Optional: Debug ke liye
        
        if (timeLeft <= 0) {
            $('#countdown').html("<p class='text-center text-white text-lg font-bold'>Match Started!</p>");
            return;
        }

        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hoursLeft = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutesLeft = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const secondsLeft = Math.floor((timeLeft % (1000 * 60)) / 1000);

        $('#days').text(days.toString().padStart(2, '0'));
        $('#hours').text(hoursLeft.toString().padStart(2, '0'));
        $('#minutes').text(minutesLeft.toString().padStart(2, '0'));
        $('#seconds').text(secondsLeft.toString().padStart(2, '0'));
    }

    setInterval(updateCountdown, 1000);
    
});
</script>
