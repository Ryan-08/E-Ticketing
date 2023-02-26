const moment = require("moment");
// db connection
const db = require("./dbConnect");

function formatMessage(username, text) {
  return {
    username,
    text,
    time: moment().format("h:mm a"),
  };
}

function saveMessages(message, username, room) {  
  var chat_id;  
  // get chat_id  
  var sql = "SELECT id FROM table_chat WHERE no_ticket = "+ room +" AND user = '"+ username +"';";
  db.query(sql, function (err, result) {
    if (err) throw err;        
    chat_id = result[0].id;    
    // save message
    var sql = "INSERT INTO messages (message, chat_id, no_ticket) VALUES ('"+ message +"', '"+ chat_id +"', '"+ room +"')";
    db.query(sql, function (err, result) {
      if (err) throw err;
      console.log("1 record inserted");
    });    
  });    
}

function getMessages(room, callback) {
  var sql = "SELECT * FROM messages where no_ticket = '"+ room +"'";
  db.query(sql, function (err, result) {
    if (err) throw err;
    return callback(result);
  });
}

module.exports = {
  formatMessage,
  saveMessages,
  getMessages,
};
