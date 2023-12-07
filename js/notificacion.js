function showInformation(message,color) {
    const informationContainer = document.getElementById('information-container');
    const informationMessage = document.getElementById('information-message');

    // Set the information message
    informationMessage.textContent = message;
    informationContainer.style.backgroundColor = color;
    // Show the information container
    informationContainer.style.display = 'block';

    // Automatically hide the information after 5 seconds (adjust as needed)
    setTimeout(() => {
        closeInformation();
    }, 5000);
}

function closeInformation() {
    const informationContainer = document.getElementById('information-container');
    informationContainer.style.display = 'none';
}
