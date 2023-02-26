const db = require("./dbConnect");

// join user to chat
function userJoin(id, username, room) {
  const user = { id, username, room };

  var sql = "INSERT INTO table_chat (user, no_ticket) SELECT * FROM (SELECT '"
            + user.username + "','"+ user.room +
            "') AS tmp WHERE NOT EXISTS (SELECT no_ticket, user FROM table_chat WHERE no_ticket = '"+ user.room +"' AND user = '"+ user.username +"') LIMIT 1";
  db.query(sql, function (err, result) {
    if (err) throw err;
    // return user;
  });    
  return user;
}

// get current user
function getCurrentUser(no_ticket) {
  // var sql = "SELECT user FROM table_chat WHERE no_ticket = '"+ no_ticket +"'";
  // db.query(sql, function (err, result) {
  //   if (err) throw err;
  //     return result;
  // });  
}

//  user leaves chat
function userLeave(id) {
  // const index = users.findIndex((user) => user.id === id);

  // if (index !== -1) {
  //   return users.splice(index, 1)[0];
  // }
}

// get room users
function getRoomId(no_ticket, user, callback) {
  // console.log(no_ticket, user);
  var sql = "SELECT id, no_ticket FROM table_chat WHERE no_ticket = "+ no_ticket +" AND user = '"+ user +"';";
  db.query(sql, function (err, result) {
    if (err) throw err;
    // console.log(result[0].id);
    return callback(result);
  });  
}

module.exports = {
  userJoin,
  getCurrentUser,
  userLeave,
  getRoomId,
};
