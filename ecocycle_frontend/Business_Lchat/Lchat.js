// Select DOM elements
const chatWindow = document.querySelector(".chat-window");
const chatInput = document.getElementById("chatInput");
const sendButton = document.getElementById("sendButton");

let waitingForProblem = false; // To track if waiting for the user's problem
let waitingForThanks = false; // To track if waiting for a thank-you message

// Function to add a message to the chat
function addMessage(sender, message) {
  const messageDiv = document.createElement("div");
  messageDiv.classList.add("message", sender);

  const avatar = document.createElement("img");
  avatar.src =
    sender === "client"
      ? "/ecocycle_frontend/images/client.png"
      : "/ecocycle_frontend/images/agent.png";
  avatar.alt = sender === "client" ? "Client" : "Agent";
  avatar.classList.add("chat-avatar");
  messageDiv.appendChild(avatar);

  const bubble = document.createElement("div");
  bubble.classList.add("chat-bubble");
  bubble.innerHTML = `<p><strong>${
    sender === "client" ? "You" : "Ecocycle Agent"
  }</strong></p><p>${message}</p>`;
  messageDiv.appendChild(bubble);

  chatWindow.appendChild(messageDiv);
  chatWindow.scrollTop = chatWindow.scrollHeight; // Auto-scroll to the bottom
}

// Event listener for the send button
sendButton.addEventListener("click", () => {
  const message = chatInput.value.trim().toLowerCase();
  if (message) {
    addMessage("client", message); // Add the user's message
    chatInput.value = "";

    if (!waitingForProblem && !waitingForThanks) {
      // First response
      setTimeout(() => {
        addMessage(
          "agent",
          "Thank you for reaching out. What can I help you with?"
        );
        waitingForProblem = true; // Update state
      }, 1000);
    } else if (waitingForProblem && !waitingForThanks) {
      // Respond with contact details
      setTimeout(() => {
        const whatsappLink =
          "https://wa.me/2349021828323?text=Hello,%20I%20need%20assistance.";
        addMessage(
          "agent",
          `Please contact this number: 09021828323. You can also reach us via WhatsApp: <a href="${whatsappLink}" target="_blank">Click here</a>.`
        );
        waitingForProblem = false; // Update state
        waitingForThanks = true; // Wait for a thank-you message
      }, 1000);
    } else if (waitingForThanks && message.includes("thank you")) {
      // Respond to thank-you message
      setTimeout(() => {
        addMessage(
          "agent",
          "You're welcome. I'm ready to assist if any other issues."
        );
        waitingForThanks = false; // Reset state
      }, 1000);
    }
  }
});

// Allow sending messages by pressing Enter
chatInput.addEventListener("keypress", (event) => {
  if (event.key === "Enter") {
    sendButton.click();
  }
});
