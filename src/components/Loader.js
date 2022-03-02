import { ThreeDots } from "react-loader-spinner";

const Loader = () => {
    return (
        <div className="loader">
            <ThreeDots type="ThreeDots" wrapperStyle={{width:'100%', display: 'block'}} color="#865cd0" height={80} width={80} />
        </div>
    )
}
export default Loader;