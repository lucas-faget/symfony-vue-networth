import axios from 'axios';

const BASE_URL: string = "https://localhost:8000";
const USER_ENDPOINT: string = "/api/users";

export const fetchAllUsers = async () => {
    try {
        const response = await axios.get(BASE_URL + USER_ENDPOINT);
        console.log(response.data)
        return response.data;
    } catch (error) {
        console.error(error);
        throw error;
    }
};

export const fetchUser = async (id: string) => {
    try {
        const response = await axios.get(`${BASE_URL}${USER_ENDPOINT}/${id}`);
        console.log(response.data)
        return response.data;
    } catch (error) {
        console.error(error);
        throw error;
    }
};

export const fetchSimilarProfiles = async (id: string) => {
    try {
        const response = await axios.get(`${BASE_URL}${USER_ENDPOINT}/${id}/similar`);
        console.log(response.data)
        return response.data;
    } catch (error) {
        console.error(error);
        throw error;
    }
};
