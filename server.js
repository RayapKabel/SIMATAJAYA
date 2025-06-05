// server.js
const express = require('express');
const { Pool } = require('pg');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Middleware
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Koneksi ke Database PostgreSQL
const pool = new Pool({
    user: 'postgres', // Ganti dengan username PostgreSQL Anda
    host: 'localhost',
    database: 'login_db', // Nama database Anda
    password: 'admin123', // Ganti dengan password PostgreSQL Anda
    port: 5432, // Port default PostgreSQL
});

// Endpoint untuk login
app.post('/login', async (req, res) => {
    const { email, password } = req.body;

    try {
        const result = await pool.query('SELECT * FROM users WHERE email = $1 AND password = $2', [email, password]);
        if (result.rows.length > 0) {
            res.status(200).json({ name: result.rows[0].name });
        } else {
            res.status(401).json({ error: 'Email atau password salah' });
        }
    } catch (err) {
        console.error(err);
        res.status(500).json({ error: 'Terjadi kesalahan pada server' });
    }
});

// Endpoint untuk register
app.post('/register', async (req, res) => {
    const { name, email, password } = req.body;

    try {
        const result = await pool.query('INSERT INTO users (name, email, password) VALUES ($1, $2, $3) RETURNING *', [name, email, password]);
        res.status(201).json({ message: 'Pendaftaran berhasil', user: result.rows[0] });
    } catch (err) {
        console.error(err);
        res.status(500).json({ error: 'Terjadi kesalahan pada server' });
    }
});

// Menjalankan server
app.listen(port, () => {
    console.log(`Server berjalan di http://localhost:3000`);
});

// Endpoint untuk mendapatkan data (misalnya, daftar pengguna)
app.get('/api/users', async (req, res) => {
    try {
        const result = await pool.query('SELECT * FROM users');
        res.status(200).json(result.rows);
    } catch (err) {
        console.error(err);
        res.status(500).json({ error: 'Terjadi kesalahan pada server' });
    }
});