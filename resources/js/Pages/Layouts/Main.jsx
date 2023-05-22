import Navbar from "@/Components/Navbar";
import OffcanvasOrders from "@/Components/OffcanvasOrders";
import Footer from "@/Components/Footer";

export default function Main({ children }) {
    return (
        <>
            <Navbar />
            <OffcanvasOrders />

            <div className="container-fluid">
                { children }
            </div>

            <Footer />
        </>
    );
}
