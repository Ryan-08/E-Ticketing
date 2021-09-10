const chatForm = document.getElementById("chat-form");
const chatMessages = document.querySelector(".chat-body");
const roomName = document.getElementById("room-name");
const userList = document.getElementById("users");

//get user and no_ticket as room
const username = user.name;
const room = ticket.no_ticket;
const user_path = path.image_path;
const image_path = from.user_profiles.image_path;

// console.log(user, room);

const ip_address = "127.0.0.1";
const socket_port = "3000";
const socket = io(ip_address + ":" + socket_port);

// Join chatroom
socket.emit("joinRoom", username, room );


socket.on("receive-message", (message) => {
  // console.log(message);
  receiveMessage(message);

  //   Scroll down
  chatMessages.scrollTop = chatMessages.scrollHeight;
});
socket.on("bot-message", (message) => {
  // console.log(message);
  botMessage(message);

  //   Scroll down
  chatMessages.scrollTop = chatMessages.scrollHeight;
});
socket.on("send-message", (message) => {
  // console.log(message);
  sendMessage(message);

  //   Scroll down
  chatMessages.scrollTop = chatMessages.scrollHeight;
});

//
chatForm.addEventListener("submit", (e) => {
  e.preventDefault();

  //   get message
  const msg = e.target.elements.msg.value;
  const username = user.name;
  const room = ticket.no_ticket;

  // console.log(username, room);

  //   emit message to server
  socket.emit("chatMessage", msg, username, room);

  //   clear input
  e.target.elements.msg.value = "";
  e.target.elements.msg.focus();
});

// Output send message to DOM
function receiveMessage(message) {
  const div = document.createElement("div");
  div.classList.add("chat-receive");
  div.innerHTML = `<img src="/storage/images/${image_path}" width=45 height=45>
                <div class="chat-message">${message.text}</div>
                <span class="time">${message.time}</span>`;        
  document.querySelector(".chat-body").appendChild(div);
}
function sendMessage(message) {
  const div = document.createElement("div");
  div.classList.add("chat-send");
  div.innerHTML = `<span class="time">${message.time}</span>                
                <div class="chat-message">${message.text}</div>
                <img src="/storage/images/${user_path}" alt="avatar" width=45 height=45>`;
  document.querySelector(".chat-body").appendChild(div);
}
function botMessage(message) {
  const div = document.createElement("div");
  div.classList.add("chat-bot");
  div.innerHTML = `<div class="chat-message text-center">${message.text}</div>`;        
  document.querySelector(".chat-body").appendChild(div);
}


