import axios from "axios";

export const getCourses = async () => {
    const response = await axios("http://127.0.0.1:8000/api/course/4");
    return response;
};
