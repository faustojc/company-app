import { useState, useEffect } from "react";
import axios from 'axios';

const api = axios.create({
    baseURL: 'http://localhost:8000/api',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    }
});

const checkAuth = async (token) => {
    try {
        const response = await api.get('/customer', {
            headers: {'Authorization': `Bearer ${token}`}
        });

        return response.data;
    } catch (error) {
        console.error(error);
        return null;
    }
};

export function AuthCustomer() {
    const [customer, setCustomer] = useState(null);

    useEffect(() => {
        const token = localStorage.getItem('token');

        if (token) {
            checkAuth(token).then(data => setCustomer(data));
        }
    }, []);

    return customer;
}
