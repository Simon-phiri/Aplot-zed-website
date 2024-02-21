const sqlite3 = required('sqlite3').verbose();
// establish a connection to sqlite database
const db = new sqlite3.Database('your-database-file.db');
// registration form
registraionForm.addEventListener('submit', function(event) {
    event.preventDefault();
    //retirieve form data
    const fullName = document.getElementById('fullName').Value;

    const email = document.getElementById('email').value;

    // insert the data into the database
    const sql = 'INSERT INTO users ('fullName ,email, ..') VALUES (?,?,.....)
    Const values = [fullName, email, ....]

    db.run(sql, values, function(err) {
        if (err) {
            console.error(err);
            //handle errors appropriately
        } else {
            // allow user access after a succeful submition
        }
        });
});
db.close();

document.getElementById('login-form').addEventListener('submit', function(e) { e.preventDefault();

    var username = document.getElementById('username').Value;
    var password = document.getElementById('password').Value;

// perform login validation here
if (username ==='s' && password === 'p') {
    alert('login successful!') //open users view
} else {
    alert('Invalid username or password');
}

// This will be used to handle dynamic content after search
function displaySearchResults(data) {
    // Update "search-results" section with flight
  
}


)