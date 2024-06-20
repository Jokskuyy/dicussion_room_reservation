<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Ruang Diskusi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Reservasi Ruang Diskusi</h1>
    </header>
    <main>
        <section id="reservation-form">
            <form action="#" method="POST">
                <div>
                    <label for="nim">NIM:</label>
                    <input type="text" id="nim" name="nim" required>
                </div>
                <div>
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="room">Pilih Ruangan:</label>
                    <select id="room" name="room" required>
                        <option value="1">Ruang 1 (Max 4 orang)</option>
                        <option value="2">Ruang 2 (Max 4 orang)</option>
                        <option value="3">Ruang 3 (Max 4 orang)</option>
                        <option value="4">Ruang 4 (Max 12 orang)</option>
                        <option value="5">Ruang 5 (Max 12 orang)</option>
                    </select>
                </div>
                <div>
                    <label for="date">Tanggal:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div>
                    <label for="time">Waktu:</label>
                    <input type="time" id="time" name="time" required>
                </div>
                <button type="submit">Reservasi</button>
            </form>
        </section>
    </main>
</body>
</html>
