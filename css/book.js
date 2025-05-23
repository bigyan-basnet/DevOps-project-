function calculateTotal() {
  var noOfDaysInput = document.getElementsByName("no_of_days")[0];
  var totalInput = document.getElementById("total");
  
  var noOfDays = parseInt(noOfDaysInput.value);
  
  // Perform your calculation here
  var total = noOfDays * 50; // Replace 10 with your calculation logic
  
  totalInput.value = total;
}