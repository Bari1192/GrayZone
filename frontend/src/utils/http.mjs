import axios from 'axios'

export const http = axios.create({
    baseURL: "https://grayzone-backend.fly.dev",
    headers:{
        "Accept": "application/json",
        "Content-Type": "application/json" 
    }
})
