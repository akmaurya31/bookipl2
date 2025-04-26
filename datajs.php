<?php
if (isset($_GET['id'])) {
    $match_id = $_GET['id'];
} else {
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
fetch('data.json')
  .then(response => response.json())
  .then(data => {
    // Find the match with match_number 51
    const match = data.find(item => item.match_number === <?php echo $match_id; ?>);
    console.log(match,"matchmatchmatch")
    
    if (match) {
      // Display match data
      $('.mid').text(match.match_number);

    // Show both team names properly
    $('.mteam').text(`${match.teams[0].team_name} vs ${match.teams[1].team_name}`);

    // Correct date and time display
    $('.mdate').text(`${match.date} ${match.time} ${match.timezone}`);

    // Correct venue display
    $('.mvenue').text(`${match.venue.stadium}, ${match.venue.city}, ${match.venue.state}`);

    //   console.log("Match Details:");
    //   console.log("Season:", match.season);
    //   console.log("Match Number:", match.match_number);
    //   console.log("Teams:", match.teams[0].team_name, "vs", match.teams[1].team_name);
    //   console.log("Date and Time:", match.date, match.time, match.timezone);
    //   console.log("Venue:", match.venue.stadium, match.venue.city, match.venue.state);
    } else {
      console.log("Match not found.");
    }
  })
  .catch(error => {
    console.error("Error fetching data:", error);
  });

    </script>