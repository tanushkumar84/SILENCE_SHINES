document.getElementById('load-more-btn').addEventListener('click', function() {
    this.style.display = 'none'; 
  });
  

  document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        document.getElementById('popup').style.display = 'block';
    }, 400); // 10 seconds
});

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}




const darkModeToggle = document.getElementById('dark-mode-toggle');
const body = document.body;

darkModeToggle.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
    const isDarkMode = body.classList.contains('dark-mode');
    localStorage.setItem('darkMode', isDarkMode);
});

// Check if dark mode is enabled from previous session
const darkMode = localStorage.getItem('darkMode');
if (darkMode) {
    body.classList.toggle('dark-mode', darkMode === 'true');
}