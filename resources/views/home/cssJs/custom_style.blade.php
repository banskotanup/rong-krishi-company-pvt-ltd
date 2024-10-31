<style>
/* Google Fonts */
@import url(https://fonts.googleapis.com/css?family=Anonymous+Pro);
/* Cursor */
.cursor{
    position: relative;
    width: 24em;
    margin: 0 auto;
    border-right: 2px solid rgba(255,255,255,.75);
    font-size: 30px;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    transform: translateY(-100%);    

}
/* Animation */
.typewriter-animation {
  animation: 
    typewriter 10s steps(50) 1s 1 normal both, 
    blinkingCursor 500ms steps(50) infinite normal;
    animation-iteration-count: infinite;

}
@keyframes typewriter {
  from { width: 0; }
  to { width: 100%; }
}
@keyframes blinkingCursor{
  from { border-right-color: rgba(255,255,255,.75); }
  to { border-right-color: transparent; }
}



/* media queries for responsive design */

</style>