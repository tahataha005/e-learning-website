import axios from "axios";

export const getUser = async () => {
    const response = await axios("http://127.0.0.1:8000/api/user/1");
    return response.data.user;
};
