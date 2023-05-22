import {router} from "@inertiajs/react";
import route from "ziggy-js/src/js";
import {Button, Form} from "react-bootstrap";
import {useState} from "react";

function Edit({ product }) {
    const [ data, setData ] = useState({
        name: product.name || '',
        description: product.description || '',
        category: product.category || '',
        flaw: product.flaw || '',
        size: product.size || '',
        price: product.price || 0,
        filename: product.filename || '',
        filepath: product.filepath || '',
    });

    function handleSubmit(e) {
        e.preventDefault();
        router.put(route('dashboard.update', [data]));
    }

    function handleChange(e) {
        const { id, value } = e.target;
        setData((prevData) => ({ ...prevData, [id]: value }));
    }

    function handleFileChange(e) {
        const file = e.target.files[0];
        if (file) {
            setData((prevData) => ({ ...prevData, filename: file.name }));
        }
    }

    return (
        <>
            <h1>Edit Product</h1>

            {/* Add a form to handle editing products */}
            <Form onSubmit={handleSubmit}>
                {/* Name field */}
                <Form.Group>
                    <Form.Label htmlFor="name">Name:</Form.Label>
                    <Form.Control
                        type="text"
                        id="name"
                        value={data.name}
                        onChange={ handleChange }
                    />
                </Form.Group>


                {/* Description field */}
                <Form.Group>
                    <Form.Label htmlFor="name">Description:</Form.Label>
                    <Form.Control
                        type="text"
                        id="description"
                        value={data.description}
                        onChange={ handleChange }
                    />
                </Form.Group>


                {/* Category field */}
                <Form.Group>
                    <Form.Label htmlFor="name">Category:</Form.Label>
                    <Form.Control
                        type="text"
                        id="category"
                        value={data.category}
                        onChange={ handleChange }
                    />
                </Form.Group>

                {/* Flaw field */}
                <Form.Group>
                    <Form.Label htmlFor="name">Flaws:</Form.Label>
                    <Form.Control
                        type="text"
                        id="flaw"
                        value={data.flaw}
                        onChange={ handleChange }
                    />
                </Form.Group>

                {/* Size field */}
                <Form.Group>
                    <Form.Label htmlFor="name">Size:</Form.Label>
                    <Form.Control
                        type="text"
                        id="size"
                        value={data.size}
                        onChange={ handleChange }
                    />
                </Form.Group>

                {/* Price field */}
                <Form.Group>
                    <Form.Label htmlFor="price">Price:</Form.Label>
                    <Form.Control
                        type="number"
                        step="0.01"
                        id="price"
                        value={data.price}
                        onChange={ handleChange }
                    />
                </Form.Group>

                {/* File upload field */}
                <Form.Group>
                    <Form.Label htmlFor="file">File:</Form.Label>
                    <Form.Control
                        type="file"
                        id="file"
                        onChange={ handleFileChange }
                    />
                </Form.Group>

                {/* Submit button */}
                <Button type="submit">Create Product</Button>
            </Form>
        </>
    );
}

export default Edit;
