document.getElementById('earth').addEventListener('click', function() {
    // Stop Earth's orbit animation
    document.querySelector('.earth').style.animation = 'none';
    
    // Show the info box and overlay
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('infoBox').style.display = 'block';
});

// Function to close the info box and resume Earth's animation
function closeInfoBox() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('infoBox').style.display = 'none';
    
    // Restart Earth's orbit animation
    document.querySelector('.earth').style.animation = 'orbit4 20s linear infinite';
}
