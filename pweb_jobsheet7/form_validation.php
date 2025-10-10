<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Form Input dengan Validasi (AJAX + Password)</h1>
    
    <form id="myForm" method="post" action="proses_validasi.php">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" class="error"></span><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span id="email-error" class="error"></span><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span id="password-error" class="error"></span><br><br>
        
        <input type="submit" value="Submit">
    </form>
    
    <div id="ajax-response" style="margin-top: 20px; border: 1px solid #ccc; padding: 10px;">
        </div>

    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(event) {
                var nama = $("#nama").val();
                var email = $("#email").val();
                var password = $("#password").val(); // Get password value
                var valid = true;

                // Validate Name (unchanged)
                if (nama === "") {
                    $("#nama-error").text("Nama harus diisi.");
                    valid = false;
                } else {
                    $("#nama-error").text("");
                }

                // Validate Email (unchanged)
                if (email === "") {
                    $("#email-error").text("Email harus diisi.");
                    valid = false;
                } else if (!/^\S+@\S+\.\S+$/.test(email)) {
                    $("#email-error").text("Format email tidak valid.");
                    valid = false;
                } else {
                    $("#email-error").text("");
                }
                
                // NEW: Validate Password Length (Client-Side)
                if (password === "") {
                    $("#password-error").text("Password harus diisi.");
                    valid = false;
                } else if (password.length < 8) {
                    $("#password-error").text("Password minimal 8 karakter.");
                    valid = false;
                } else {
                    $("#password-error").text("");
                }

                // AJAX Submission Logic (unchanged)
                if (!valid) {
                    event.preventDefault(); 
                    return;
                }
                
                event.preventDefault(); 
                var formData = $(this).serialize(); 

                $.ajax({
                    type: "POST",
                    url: "proses_validasi.php", 
                    data: formData,
                    success: function(response) {
                        $("#ajax-response").html("Server Response:<br>" + response);
                    },
                    error: function() {
                        $("#ajax-response").html("Terjadi kesalahan saat mengirim data ke server.");
                    }
                });
            });
        });
    </script>
</body>
</html>