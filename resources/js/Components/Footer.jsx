export default function Footer() {
    return (
        <footer>
            <div className="bg-body-secondary text-muted py-5">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-5 mb-5 mb-lg-0">
                            <div className="fw-bold text-uppercase text-lg text-dark mb-3">𝐃𝐞𝐥𝐚𝐫𝐠𝐨 𝐏𝐇 ⌇ 𝐭𝐡𝐫𝐢𝐟𝐭𝐞𝐝 𝐣𝐞𝐚𝐧𝐬</div>
                            <p className="text-muted">Thrift & Consignment Store collections of curated premium bottoms</p>
                            <ul className="list-inline">
                                <li className="list-inline-item">
                                    <a href="#" className="text-muted text-primary-hover bi bi-facebook" target="_blank"></a>
                                </li>
                                <li className="list-inline-item">
                                    <a href="#" className="text-muted text-primary-hover bi bi-twitter" target="_blank"></a>
                                </li>
                                <li className="list-inline-item">
                                    <a href="#" className="text-muted text-primary-hover bi bi-instagram" target="_blank"></a>
                                </li>
                            </ul>
                        </div>
                        <div className="col-lg-2 col-md-6 mb-5 mb-lg-0">
                            <h6 className="fw-bold text-dark mb-3">SHOP</h6>
                            <ul className="list-unstyled">
                                <li><a className="text-muted text-decoration-none" href="#">For Men</a></li>
                                <li><a className="text-muted text-decoration-none" href="#">For Women</a></li>
                                <li><a className="text-muted text-decoration-none" href="#">Shop</a></li>
                            </ul>
                        </div>
                        <div className="col">
                            <h6 className="fw-bold text-dark mb-3">OFFERS & SALES</h6>
                            <p className="mb-3">Enter your email to receive news for offers and sales on our products</p>
                            <form method="post" action="#">
                                <div className="input-group mb-3">
                                    <input type="email" className="form-control bg-transparent border-secondary rounded-0" placeholder="Your Email Address" aria-label="Your Email Address" />
                                    <button className="btn btn-outline-secondary rounded-0 bi bi-send-fill" type="submit" name="subscribe_email"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div className="fw-light bg-dark-subtle py-4">
                <div className="container">
                    <p className="mb-md-0">© 2023 Delargo PH All rights reserved.</p>
                </div>
            </div>
        </footer>
    );
}
