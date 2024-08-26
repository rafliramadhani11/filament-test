import preset from "./vendor/filament/support/tailwind.config.preset";

export default {
   darkMode: "class",
   presets: [preset],
   content: [
      "./app/Filament/**/*.php",
      "./app/Filament/**/*/*.php",
      "./resources/views/filament/**/*.blade.php",
      "./vendor/filament/**/*.blade.php",
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
   ],
   theme: {
      extend: {},
   },
   plugins: [],
};
