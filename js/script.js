document.addEventListener("DOMContentLoaded", function() {
  const searchInput = document.getElementById("search");
  const rows = document.querySelectorAll("tbody tr");

  searchInput.addEventListener("input", function() {
    const searchTerm = searchInput.value.toLowerCase();

    rows.forEach(row => {
      const rowData = Array.from(row.children).map(cell => cell.textContent.toLowerCase());
      if (rowData.some(data => data.includes(searchTerm))) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  });
});