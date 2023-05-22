import route from "ziggy-js/src/js";
import { Link, usePage } from "@inertiajs/react";
import Main from "@/Pages/Layouts/Main";

function Hero() {
    return (
        <section className="row w-100 px-5 m-0 hero">
            <div className="col-lg col-sm-12 py-lg-0 py-5">
                <div
                    className="row align-items-center justify-content-lg-start justify-content-sm-center align-content-center h-100">
                    <div className="col-12 text-center text-lg-start">
                        <p className="text-uppercase sub-title">THRIFTED JEANS</p>
                    </div>
                    <div className="col-12 text-center text-lg-start">
                        <h1 className="title">Curated. Premium. Bottoms</h1>
                    </div>
                    <div className="col-12 text-center text-lg-start">
                        <a href={ route('products.index') } className="btn btn-dark px-5 py-3 rounded-0">Shop Collection</a>
                    </div>
                </div>
            </div>
            <div className="col-lg col-sm-12 py-lg-0 pt-sm-5">
                <div className="d-flex justify-content-center">
                    <img src="/resource/images/hero.png" className="img-fluid" alt="DelargoPH"/>
                </div>
            </div>
        </section>
    )
}

function Content({products}) {
    return (
        <section className="pt-5 w-100">
            <div className="container">
                <div className="row mb-5">
                    <div className="col-12 text-center">
                        <p className="text-uppercase sub-title">Summer Collection</p>
                    </div>
                    <div className="col-12 text-center">
                        <h2 className="title">Popular Pants</h2>
                    </div>
                    <div className="d-flex flex-wrap justify-content-center pt-5">

                        {products.slice(0, 4).map((product) => (
                            <div key={ product.product_id } className="card rounded-0 mx-2 mb-4" style={{ width: '19rem' }}>
                                <Link href={ route('products.show', [product]) }>
                                    <img src={product.filepath + product.filename} className="card-img-top mb-2" alt={ product.name } />
                                </Link>
                                <div className="card-body">
                                    <p className="card-title text-uppercase m-0 sub-title">{ product.category }</p>
                                    <Link href={ route('products.show', [product]) } className="fw-bold text-body product-name text-decoration-none">
                                        {product.name}
                                    </Link>
                                    <p className="text-success sub-title">P {  parseFloat(product.price).toFixed(2) }</p>
                                    <Link href={ route('products.show', [product]) } className="btn btn-outline-secondary rounded-0 text-uppercase px-2 py-1">
                                        <span className="bi bi-cart me-2"></span>
                                        Add to Cart
                                    </Link>
                                </div>
                            </div>
                        ))}

                    </div>
                </div>
            </div>
        </section>
    )
}

function Feature() {
    return (
        <section className="w-100">
            <div className="d-flex flex-wrap justify-content-center mx-100">
                <div className="d-flex flex-column align-items-center p-2">
                    <div className="mb-2 pb-3">
                        <img src="/resource/images/delargo-model.jpg" className="img-fluid" alt=""/>
                    </div>
                    <div className="mb-2">
                        <h6 className="text-uppercase sub-title">Pants</h6>
                    </div>
                    <div className="mb-2">
                        <h2 className="fw-bold">The base collection - Ideal every day.</h2>
                    </div>
                    <div className="mb-2">
                        <Link href={ route('products.index') } className="btn btn-dark px-4 py-2 rounded-0">Shop Now</Link>
                    </div>
                </div>
                <div className="m-2">
                    <img src="/resource/images/delargo-model1.jpg"   className="img-fluid" alt="" />
                </div>
            </div>
        </section>
    )
}

function Home() {
    const { products } = usePage().props;

    return (
        <Main>
            <Home.Hero />
            <Home.Content products={products} />
            <Home.Feature />
        </Main>
    );
}

Home.Hero = Hero;
Home.Content = Content;
Home.Feature = Feature;

export default Home;
