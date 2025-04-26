<?php
// Check if the 'id' parameter is passed in the URL
if (isset($_GET['id'])) {
    // Retrieve the 'id' from the URL
    $match_id = $_GET['id'];

    // Use the match ID (for example, display it or fetch data related to the match)
    //echo "Match ID: " . $match_id;

    // You can now use this $match_id to fetch data from a database or perform other operations
    // Example: Fetch match details from the database (pseudo code)
    // $match_details = get_match_details($match_id);
} else {
    // If the 'id' parameter is not set in the URL
    //echo "No match ID provided.";
}
?>



<script>
    // Fetching the JSON file
fetch('data.json')
  .then(response => response.json()) // Parse the JSON data
  .then(data => {
    // Wait for the button click to fetch data based on user input
    const fetchButton = document.getElementById('fetch-data');
    const userIdInput = document.getElementById('user-id');

    fetchButton.addEventListener('click', () => {
      const userId = userIdInput.value; // Get user ID from input field

      if (data[userId]) {
        // If the user ID exists in the data, display the user info
        const userInfo = data[userId];

        document.getElementById('user-name').innerText = `Name: ${userInfo.name}`;
        document.getElementById('user-age').innerText = `Age: ${userInfo.age}`;
        document.getElementById('user-city').innerText = `City: ${userInfo.city}`;
      } else {
        // If user ID does not exist
        alert('User not found');
      }
    });
  })
  .catch(error => {
    console.log('Error fetching JSON:', error);
  });

    </script>