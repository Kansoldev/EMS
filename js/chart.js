$(function () {
  // Pie Chart

  var ctx = document.getElementById("pieChart").getContext("2d");
  var pieChart = new Chart(ctx, {
    type: "pie",
    data: {
      labels: ["Back End", "Front End", "UI/UX Design", "Project Management"],
      datasets: [
        {
          label: "# of Votes",
          data: [2, 1, 1, 1],
          backgroundColor: [
            "rgba(255, 99, 132, 1)",
            "#3E007C",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: true,
      legend: {
        display: false,
      },
    },
  });
});
