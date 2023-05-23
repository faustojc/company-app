import { useState } from "react";
import { NumericFormat } from "react-number-format";
import axios from "axios";
import {usePage} from "@inertiajs/react";
import route from "ziggy-js/src/js";

function Orders({ orders, customer }) {
    const [customerOrders, setCustomerOrders] = useState(orders);

    function increment(order) {
        const updatedTotalPrice = (order.quantity + 1) * order.product.price;

        axios.patch('home/orders/${order}', {quantity: order.quantity + 1, total_price: updatedTotalPrice})
            .then(response => {
                setCustomerOrders(
                    orders.map(o => (o.customer_id === customer.customer_id && o.product.product_id === order.product_id) ? response.data : o)
                )
            });
    }

    function decrement(order) {
        const updatedTotalPrice = (order.quantity - 1) * order.product.price;

        axios.patch('home/orders/${order}', {quantity: order.quantity - 1, total_price: updatedTotalPrice})
            .then(response => {
                setCustomerOrders(
                    orders.map(o => (o.customer_id === customer.customer_id && o.product.product_id === order.product_id) ? response.data : o)
                )
            });
    }

    return (
        <>
            {customerOrders.map(order => (
                <div className="d-flex mb-3" key={ order.order_id }>
                    <div className="card border-0 px-2">
                        <div className="row align-items-center g-0">
                            <div className="col-md-3">
                                <img src={ order.product.filepath + order.product.filename } className="img-fluid" width="170" alt="" />
                            </div>
                            <div className="col">
                                <div className="card-body">
                                    <h6 className="card-title fw-bolder">{ order.product.name }</h6>
                                    <p className="card-text"> <NumericFormat displayType={'text'} value={ order.product.price } prefix={"₱"} thousandSeparator={true}></NumericFormat> </p>
                                    <div className="d-flex">
                                        <button className="btn btn-outline-secondary bi bi-dash rounded-0" type="button" onClick={() => decrement(order)}></button>
                                        <input className="text-center form-control rounded-0 w-25" type="number" min="1" value={ order.quantity } />
                                        <button className="btn btn-outline-secondary bi bi-plus rounded-0" type="button" onClick={() => increment(order)}></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="px-2">
                        <i className="btn bi bi-trash"></i>
                    </div>
                </div>
            ))}
        </>
    );
}

// The function to export
function OffcanvasOrders() {
    const { auth, orders, customer } = usePage().props;

    return (
        <>
            <div className="offcanvas offcanvas-end" tabIndex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
                <div className="offcanvas-header">
                    <h5 className="offcanvas-title nav-link" id="offcanvasCartLabel">CART LIST</h5>
                    <button className="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <a href={ route('orders.index') }>
                    <button>VIEW ALL CART</button>
                </a>
                <div className="offcanvas-body">
                    {auth ? <Orders orders={orders} customer={customer} /> : 'You don\'t have any added carts'}
                </div>
            </div>
        </>
    );
}

export default OffcanvasOrders;
