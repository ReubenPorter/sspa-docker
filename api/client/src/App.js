import React from "react";
import CssBaseline from "@material-ui/core/CssBaseline";
import { Button, ThemeProvider, Typography } from "@material-ui/core";
import theme from "./theme";

function App() {
  return (
    <ThemeProvider theme={theme}>
      <CssBaseline />
      <Typography variant="h2">Hello from react</Typography>
      <Button>Example button</Button>
    </ThemeProvider>
  );
}

export default App;
