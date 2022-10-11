import axios from "axios";

const getAPI = async api_url => {
    const response = await axios(api_url);
    return response.data;
};

export default getAPI;
