import {Head, usePage} from "@inertiajs/react";
import Main from "@/Pages/Layouts/Main";

function Index() {
    const { orders } = usePage().props;

    return (
        <Main>
            <Head title="Orders" />
            {orders.map((order) => (
                <div key={order.id} className="card mb-3">
                    <div className="card-body">
                        <div className="row">
                            <div className="col-md-6">
                                <h5 className="card-title">{ order.product.name }</h5>
                                <p className="card-text">{ order.product.description }</p>
                            </div>
                            <div className="col-md-6">
                                <p className="card-text">Quantity: { order.quantity }</p>
                                <p className="card-text">Total: { order.total }</p>
                            </div>
                        </div>
                    </div>
                </div>
            ))}
        </Main>
    );
}

export default Index;
