from fastapi import FastAPI, Body
import main
from logger import log_buffer


app = FastAPI()

@app.post("/run")
def run():
    portal = "green_alps"

    log_buffer.clear()  # reset logs

    main.run_pipeline(portal)

    return {
        "status": "success",
        "logs": log_buffer
    }