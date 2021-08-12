const chatForm = document.getElementById("chat-form");
const chatMessages = document.querySelector(".chat-body");
const roomName = document.getElementById("room-name");
const userList = document.getElementById("users");

// get uname and room in this case room is no ticket
const { username, room } = Qs.parse(location.search, {
  ignoreQueryPrefix: true,
});

// console.log(username, room);

const ip_address = "127.0.0.1";
const socket_port = "3000";
const socket = io(ip_address + ":" + socket_port);

// Join chatroom
socket.emit("joinRoom", { username, room });

//  get room and user
socket.on("roomUsers", ({ room, users }) => {
  outputRoomName(room);
  outputUsers(users);
});
var typing=false;
var timeout=undefined;
$('#msg').keypress((e)=>{
  if(e.which!=13){
    typing=true
    socket.emit('typing', {user:"user", typing:true})
    clearTimeout(timeout)
    timeout=setTimeout(typingTimeout, 3000)
  }else{
    clearTimeout(timeout)
    typingTimeout()
    //sendMessage() function will be called once the user hits enter
    // sendMessage()
  }
})

socket.on('display', (data)=>{
  if(data.typing==true) {
    onTyping();
    chatMessages.scrollTop = chatMessages.scrollHeight;    
  }     
  else
    false;
})

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
  //   emit message to server
  socket.emit("chatMessage", msg);

  //   clear input
  e.target.elements.msg.value = "";
  e.target.elements.msg.focus();
});

// Output send message to DOM
function sendMessage(message) {
  const div = document.createElement("div");
  div.classList.add("chat-send");
  div.innerHTML = `<span class="time">${message.time}</span>                
                <div class="chat-message">${message.text}</div>
                <img src="/images/tes-profil.jpg" alt="avatar" width=45 height=45>`;
        // `<p class="meta">${message.username} <span>${message.time}</span></p>
        // <p class="text">
        //   ${message.text}
        // </p>`
  document.querySelector(".chat-body").appendChild(div);
}
function receiveMessage(message) {
  const div = document.createElement("div");
  div.classList.add("chat-receive");
  div.innerHTML = `<img src="/images/tes-profil.jpg" alt="avatar" width=45 height=45>  
                <div class="chat-message">${message.text}</div>
                <span class="time">${message.time}</span>`;
        // `<p class="meta">${message.username} <span>${message.time}</span></p>
        // <p class="text">
        //   ${message.text}
        // </p>`
  document.querySelector(".chat-body").appendChild(div);
}
function botMessage(message) {
  const div = document.createElement("div");
  div.classList.add("chat-receive");
  div.innerHTML = `<span class="time">${message.time}</span>                
                <div class="chat-message">${message.text}</div>`;        
  document.querySelector(".chat-body").appendChild(div);
}

function onTyping() {
  const div = document.createElement("div");
  div.classList.add("typing");
  div.innerHTML = `<img src="{{ asset('images/tes-profil.jpg')}}" alt="avatar" width=45 height=45>
                  <div class="typing-text">
                      <span>.</span>
                      <span>.</span>
                      <span>.</span>
                      <span>.</span>
                  </div>`
  document.querySelector(".chat-body").appendChild(div);
}

// add room name to DOM
function outputRoomName(room) {
  roomName.innerText = room;
}

// add users to DOM
function outputUsers(users) {
  userList.innerHTML = `
    ${users.map((user) => `<li>${user.username}</li>`).join("")}
  `;
}
