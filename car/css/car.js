// Get all detail buttons, close buttons, card containers, additional details, and descriptions
const detailButtons = document.querySelector('.detail-btn');
const closeButtons = document.querySelector('.close-btn');
const cardContainers = document.querySelector('.card-container');
const additionalDetails = document.querySelector('.additional-details');
const descriptions = document.querySelector('.description');

// Add event listeners to each detail button
detailButtons.forEach(function (button, index) {
  button.addEventListener('click', function () {
    // Hide the description
    descriptions[index].style.display = 'none';

    // Show the additional details
    additionalDetails[index].style.display = 'block';
  });
});

// Add event listeners to each close button
closeButtons.forEach(function (button, index) {
  button.addEventListener('click', function () {
    // Show the description
    descriptions[index].style.display = 'block';

    // Hide the additional details
    additionalDetails[index].style.display = 'none';
  });
});
