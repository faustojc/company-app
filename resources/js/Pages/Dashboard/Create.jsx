import {router} from "@inertiajs/react";
import {Button, Form} from "react-bootstrap";
import {useState} from "react";
import route from "ziggy-js/src/js";

function Create() {
    const [ product, setProduct ] = useState({
        name: '',
        description: '',
        category: '',
        flaw: '',
        size: '',
        price: 0,
        filename: '',
        filepath: 'http://127.0.0.1:8000/resource/products/',
    });

    function handleSubmit(e) {
        e.preventDefault();

        // Create a new FormData instance
        const formData = new FormData();
        formData.append('name', product.name);
        formData.append('description', product.description);
        formData.append('category', product.category);
        formData.append('flaw', product.flaw);
        formData.append('size', product.size);
        formData.append('price', product.price);
        formData.append('filename', product.filename);
        formData.append('filepath', product.filepath);

        // Append the selected file to the form data
        const fileInput = document.querySelector('#file');

        if (fileInput.files[0]) {
            formData.append('image', fileInput.files[0]);
        }

        // Send the form data to the server
        router.post(route('admin_product.store'), formData);
    }


    function handleChange(e) {
        const { id, value } = e.target;

        if (id === 'price') {
            setProduct((prevData) => ({ ...prevData, [id]: parseInt(value) }));
            return;
        }

        setProduct((prevData) => ({ ...prevData, [id]: value }));
    }

    function handleFileChange(e) {
        const file = e.target.files[0];
        if (file) {
            setProduct((prevData) => ({ ...prevData, filename: file.name }));
        }
    }

    return (
        <div className="container">
            <h1>Create Product</h1>

            {/* Add a form to handle creating products */}
            <Form onSubmit={handleSubmit}>
                {/* Name field */}
                <Form.Group>
                    <Form.Label htmlFor="name">Name:</Form.Label>
                    <Form.Control
                        type="text"
                        id="name"
                        value={product.name}
                        onChange={ handleChange }
                    />
                </Form.Group>


                {/* Description field */}
                <Form.Group>
                    <Form.Label htmlFor="name">Description:</Form.Label>
                    <Form.Control
                        type="text"
                        id="description"
                        value={product.description}
                        onChange={ handleChange }
                    />
                </Form.Group>


                {/* Category field */}
                <Form.Group>
                    <Form.Label htmlFor="name">Category:</Form.Label>
                    <Form.Control
                        type="text"
                        id="category"
                        value={product.category}
                        onChange={ handleChange }
                    />
                </Form.Group>

                {/* Flaw field */}
                <Form.Group>
                    <Form.Label htmlFor="name">Flaws:</Form.Label>
                    <Form.Control
                        type="text"
                        id="flaw"
                        value={product.flaw}
                        onChange={ handleChange }
                    />
                </Form.Group>

                {/* Size field */}
                <Form.Group>
                    <Form.Label htmlFor="name">Size:</Form.Label>
                    <Form.Control
                        type="text"
                        id="size"
                        value={product.size}
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
                        value={product.price}
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
        </div>
    );
}

export default Create;
