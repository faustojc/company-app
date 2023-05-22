import { useState } from 'react';
import route from "ziggy-js/src/js";
import { router } from "@inertiajs/react";
import {Button, Form} from "react-bootstrap";

function Register() {
    const [name, setName] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    const handleSubmit = (event) => {
        event.preventDefault();

        router.post(route('admin.register', [name, email, password]));
    };

    return (
        <Form onSubmit={handleSubmit}>
            <Form.Group>
                <Form.Label htmlFor="name">Name:</Form.Label>
                <Form.Control
                    type="text"
                    id="name"
                    value={name}
                    onChange={(e) => setName(e.target.value)}
                />
            </Form.Group>

            <Form.Group>
                <Form.Label htmlFor="email">Email:</Form.Label>
                <Form.Control
                    type="email"
                    id="email"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                />
            </Form.Group>

            <Form.Group>
                <Form.Label htmlFor="password">Password:</Form.Label>
                <Form.Control
                    type="password"
                    id="password"
                    value={password}
                    onChange={(e) => setPassword(e.target.value)}
                />
            </Form.Group>

            <Button type="submit" value="Submit" >Register</Button>
        </Form>
    );
}

export default Register;
