import {Link, router} from "@inertiajs/react";
import route from "ziggy-js/src/js";
import {Table} from "react-bootstrap";

function Index({ products }) {
    function handleDelete(product) {
        if (confirm('Are you sure you want to delete this product?')) {
            router.delete(route('dashboard.destroy', product));
        }
    }

    return (
        <>
            <h1>Dashboard</h1>

            <Link href={ route('dashboard.create') }>Create Product</Link>

            <Table striped responsive>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Flaw</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                {products.map((product) => (
                    <tr key={product.product_id}>
                        <td>{product.name}</td>
                        <td>{product.description}</td>
                        <td>{product.category}</td>
                        <td>{product.flaw}</td>
                        <td>{product.size}</td>
                        <td>{product.price}</td>
                        <td>
                            <Link href={ route('dashboard.edit', [product]) }>Edit</Link>

                            {/* Add a form to handle deleting products */}
                            <button onClick={() => handleDelete(product)}>Delete</button>
                        </td>
                    </tr>
                ))}
                </tbody>
            </Table>
        </>
    );
}

export default Index;
