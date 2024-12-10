// Select DOM elements
const chatWindow = document.querySelector(".chat-window");
const chatInput = document.getElementById("chatInput");
const sendButton = document.getElementById("sendButton");

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
  const message = chatInput.value.trim();
  if (message) {
    addMessage("client", message); // Add the user's message
    chatInput.value = "";

    // Simulate agent response after 1 second
    setTimeout(() => {
      addMessage("agent", "Thank you for reaching out. We're looking into it.");
    }, 1000);
  }
});

// Allow sending messages by pressing Enter
chatInput.addEventListener("keypress", (event) => {
  if (event.key === "Enter") {
    sendButton.click();
  }
});
