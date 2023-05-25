import Navbar from "@/Components/Navbar";
import OffcanvasOrders from "@/Components/OffcanvasOrders";
import Footer from "@/Components/Footer";

function Index({ orders }) {

    return (
        <>
            <Navbar />
            <OffcanvasOrders />

            <div className="container-fluid">
                <div className="d-flex flex-wrap justify-content-center pt-5">

                    {orders.map((order) => (
                        <div key={order.order_id} className="card mb-3 rounded-0 mx-2" style={{maxWidth: '600px'}}>
                            <div className="row g-0">
                                <div className="col-md-3">
                                    <img src={order.product.filepath + order.product.filename} className="img-fluid" alt={ order.product.name } style={{ width: '10rem' }} />
                                </div>
                                <div className="col-md-8 p-3">
                                    <div className="row g-1">
                                        <div className="col">
                                            <h5 className="card-title">{ order.product.name }</h5>
                                            <p className="card-text">{ order.product.description }</p>
                                        </div>
                                        <div className="col">
                                            <p className="card-text">Quantity: { order.quantity }</p>
                                            <p className="card-text">Total: P{ parseFloat(order.total_price).toFixed(2) }</p>
                                        </div>
                                    </div>
                                    <div className="px-2">
                                        <a href={ route('orders.destroy', {'order': order.order_id}) }>
                                            <i className="btn bi bi-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}

                </div>
            </div>

            <Footer />
        </>
    );
}

export default Index;
